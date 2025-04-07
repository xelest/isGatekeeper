#include <HTTPClient.h>
#include <WiFi.h>
#include <WebServer.h>

#include <SPI.h>
#include <MFRC522.h>


// For Arduino Microcontroller
//#define RST_PIN         9
//#define SS_PIN          10

// For ESP8266 Microcontroller
//#define RST_PIN         D0
//#define SS_PIN          D8

// For ESP32 Microcontroller
#define RST_PIN         16
#define SS_PIN          21

//#define SS_PIN D2  //--> SDA / SS is connected to pinout D2
//#define RST_PIN D1  //--> RST is connected to pinout D1

MFRC522 mfrc522(SS_PIN, RST_PIN);  //--> Create MFRC522 instance.

#define ON_Board_LED 2  //--> Defining an On Board LED, used for indicators when the process of connecting to a wifi router

const char* ssid = "JHERNANDEZ156-2.4G";
const char* password = "2016180067";


WebServer server(80);  //--> Server on port 80

int readsuccess;
byte readcard[4];
char str[32] = "";
String StrUID;
String scan;

void setup() {
  Serial.begin(115200); //--> Initialize serial communications with the PC
  SPI.begin();      //--> Init SPI bus
  mfrc522.PCD_Init(); //--> Init MFRC522 card

  delay(500);

  WiFi.begin(ssid, password); //--> Connect to your WiFi router
  Serial.println("");
    
  pinMode(ON_Board_LED,OUTPUT); 
  digitalWrite(ON_Board_LED, HIGH); //--> Turn off Led On Board


  Serial.print("Connecting");
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");

    digitalWrite(ON_Board_LED, LOW);
    delay(250);
    digitalWrite(ON_Board_LED, HIGH);
    delay(250);
  }
  digitalWrite(ON_Board_LED, HIGH); //--> Turn off the On Board LED when it is connected to the wifi router.

  Serial.println("");
  Serial.println("Successfully connected to the network! ");
  //Serial.println(ssid);
  //Serial.print("IP address: ");
  //Serial.println(WiFi.localIP());

  Serial.println("Scanning....");
  Serial.println("");
}


void loop() {
  // put your main code here, to run repeatedly
  readsuccess = getid();
  
  if(readsuccess) { 
  digitalWrite(ON_Board_LED, LOW);
    HTTPClient http;    
 
    String UIDresultSend, postData;
    UIDresultSend = StrUID;
   
    //Post Data
    postData = "UIDresult=" + UIDresultSend;
     Serial.println(UIDresultSend);

    http.begin("http://192.168.0.243/IT199R_02/gatekeeperdevice/getUID.php");  //Specify request destination 
    http.addHeader("Content-Type", "application/x-www-form-urlencoded"); //Specify content-type header   
    int httpCode = http.POST(postData);   //Send the request    
    String payload = http.getString();    //Get the response payload
    Serial.println(payload);

     http.begin("http://192.168.0.243/IT199R_02/gatekeeperdevice/getUID_out.php");  //Specify request destination   
     http.addHeader("Content-Type", "application/x-www-form-urlencoded"); //Specify content-type header   
     int httpCode2 = http.POST(postData);   //Send the request
     String payload2 = http.getString();    //Get the response payload
     Serial.println(payload2);
    
    //Serial.println(httpCode);   //Print HTTP return code
    //Serial.println(payload);    //Print request response payload
    
    http.end();  //Close connection
    delay(1000);
    digitalWrite(ON_Board_LED, HIGH);
  }
}


//GET CARD UID
int getid() {  
  if(!mfrc522.PICC_IsNewCardPresent()) {
    return 0;
  }
  if(!mfrc522.PICC_ReadCardSerial()) {
    return 0;
  }
   
  Serial.print("RF CARD SCANNED : ");
  
  for(int i=0;i<4;i++){
    readcard[i]=mfrc522.uid.uidByte[i]; //storing the UID of the tag in readcard
    array_to_string(readcard, 4, str);
    StrUID = str;
  }
  mfrc522.PICC_HaltA();
  return 1;
}

//CHANGE CARD TO UID
void array_to_string(byte array[], unsigned int len, char buffer[]) {
    for (unsigned int i = 0; i < len; i++)
    {
        byte nib1 = (array[i] >> 4) & 0x0F;
        byte nib2 = (array[i] >> 0) & 0x0F;
        buffer[i*2+0] = nib1  < 0xA ? '0' + nib1  : 'A' + nib1  - 0xA;
        buffer[i*2+1] = nib2  < 0xA ? '0' + nib2  : 'A' + nib2  - 0xA;
    }
    buffer[len*2] = '\0';
}
