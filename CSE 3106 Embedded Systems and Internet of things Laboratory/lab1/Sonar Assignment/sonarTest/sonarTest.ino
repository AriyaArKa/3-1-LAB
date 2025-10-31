int trigPin = A0;
int echoPin = A1;

float distance;
float duration;


void setup() {
  pinMode(trigPin,OUTPUT);
  pinMode(echoPin,INPUT);
  Serial.begin(9600);
}

void loop() {
  digitalWrite(trigPin, LOW);
  delay(2);

  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);

  // echo pin ta high hobar por low hoyar ag porjonto kotokkhon high cilo tr time
  // countes in microseconds
  duration = pulseIn(echoPin, HIGH);

  //cm
  distance = (duration * 0.034)/2;

  //show in serial monitor
  Serial.print("The distance is = ");
  Serial.print(distance);
  Serial.print("cm");
  delay(500);



}
