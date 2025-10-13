// Motor pins
const int m1u = 8;  // Left Motor
const int m1l = 9;
const int m2u = 12; // Right Motor
const int m2l = 13;

void setup() {
  // Set motor pins as output
  pinMode(m1u, OUTPUT);
  pinMode(m1l, OUTPUT);
  pinMode(m2u, OUTPUT);
  pinMode(m2l, OUTPUT);
}

void loop() {
  moveForward();
  delay(2000); // Move forward for 2 seconds

  stopMotors();
  delay(1000); // Pause for 1 second

  moveBackward();
  delay(2000); // Move backward for 2 seconds

  stopMotors();
  delay(1000); // Pause for 1 second
}

// Move forward
void moveForward() {
  digitalWrite(m1u, HIGH);
  digitalWrite(m1l, LOW);
  digitalWrite(m2u, HIGH);
  digitalWrite(m2l, LOW);
}

// Move backward
void moveBackward() {
  digitalWrite(m1u, LOW);
  digitalWrite(m1l, HIGH);
  digitalWrite(m2u, LOW);
  digitalWrite(m2l, HIGH);
}

// Stop all motors
void stopMotors() {
  digitalWrite(m1u, LOW);
  digitalWrite(m1l, LOW);
  digitalWrite(m2u, LOW);
  digitalWrite(m2l, LOW);
}