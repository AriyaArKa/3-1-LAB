const int TRIG_PIN = 9;
const int ECHO_PIN = 10;

float currentDist;
float minDistance = 9999.0;
float maxDistance = 0.0;
int obstacleCount = 0;

unsigned long startTime;

const int MEASURE_INTERVAL = 500; // ms
const int SUMMARY_INTERVAL = 30000; // ms
const float SOUND_SPEED = 0.0343; // cm per microsecond

// New variables for distinct obstacle detection
bool obstaclePresent = false;  // tracks if currently seeing an obstacle
const float OBSTACLE_THRESHOLD = 100.0; // cm

void setup() {
  Serial.begin(9600);
  pinMode(TRIG_PIN, OUTPUT);
  pinMode(ECHO_PIN, INPUT); 
  startTime = millis();
}

void loop() {
  currentDist = getDistance();
  maxDistance = currentDist;

  Serial.print("Distance: ");
  Serial.print(currentDist);
  Serial.println(" cm");

  if (currentDist < minDistance) minDistance = currentDist;
  if (currentDist > maxDistance) maxDistance = currentDist;

  // Detect new obstacle only once when it first appears
  if (currentDist < OBSTACLE_THRESHOLD && !obstaclePresent) {
    obstacleCount++;
    obstaclePresent = true; // mark that obstacle is detected
  }

  // Reset flag when obstacle goes away
  if (currentDist >= OBSTACLE_THRESHOLD && obstaclePresent) {
    obstaclePresent = false;
  }

  if (millis() - startTime >= SUMMARY_INTERVAL) {
    printSummary();
    resetStats();
  }

  delay(MEASURE_INTERVAL);
}

float getDistance() {
  digitalWrite(TRIG_PIN, LOW);
  delayMicroseconds(2);
  digitalWrite(TRIG_PIN, HIGH);
  delayMicroseconds(10);
  digitalWrite(TRIG_PIN, LOW);

  long duration = pulseIn(ECHO_PIN, HIGH);

  return duration * SOUND_SPEED / 2.0;
}

void printSummary() {
  Serial.println("----- 30-Second Summary -----");
  Serial.print("Minimum Distance: ");
  Serial.print(minDistance);
  Serial.println(" cm");

  Serial.print("Maximum Distance: ");
  Serial.print(maxDistance);
  Serial.println(" cm");

  Serial.print("Distinct Obstacles Detected: ");
  Serial.println(obstacleCount);
}

void resetStats() {
  minDistance = 9999.0;
  maxDistance = 0.0;
  obstacleCount = 0;
  startTime = millis();
  obstaclePresent = false;
}
