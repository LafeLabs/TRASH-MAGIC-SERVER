//I took an old sketch from teaching creative coding and made it a website for weird web october (https://annoying.one)
let potato; // the picture of the instrument
let sounds = []; // the array of sounds
let soundSwitch = []; // the sound boolean for on/off
let x = [261, 221, 244, 291, 237, 287, 325, 279]; // x location of eyes
let y = [178.5, 230.5, 248.5, 262.5, 296.5, 312.5, 337.5, 375.5]; // y location of eyes

function preload() {
  potato = loadImage(
    "https://openprocessing-usercontent.s3.amazonaws.com/files/user281109/visual1507080/h48536331cb7815218574d2b8528760d5/potato.png"
  );
  sounds[0] = loadSound(
    "https://openprocessing-usercontent.s3.amazonaws.com/files/user281109/visual1507080/h48536331cb7815218574d2b8528760d5/c.m4a"
  );
  sounds[1] = loadSound(
    "https://openprocessing-usercontent.s3.amazonaws.com/files/user281109/visual1507080/h48536331cb7815218574d2b8528760d5/d.m4a"
  );
  sounds[2] = loadSound(
    "https://openprocessing-usercontent.s3.amazonaws.com/files/user281109/visual1507080/h48536331cb7815218574d2b8528760d5/ege.m4a"
  );
  sounds[3] = loadSound(
    "https://openprocessing-usercontent.s3.amazonaws.com/files/user281109/visual1507080/h48536331cb7815218574d2b8528760d5/f.m4a"
  );
  sounds[4] = loadSound(
    "https://openprocessing-usercontent.s3.amazonaws.com/files/user281109/visual1507080/h48536331cb7815218574d2b8528760d5/g.m4a"
  );
  sounds[5] = loadSound(
    "https://openprocessing-usercontent.s3.amazonaws.com/files/user281109/visual1507080/h48536331cb7815218574d2b8528760d5/a.m4a"
  );
  sounds[6] = loadSound(
    "https://openprocessing-usercontent.s3.amazonaws.com/files/user281109/visual1507080/h48536331cb7815218574d2b8528760d5/b.m4a"
  );
  sounds[7] = loadSound(
    "https://openprocessing-usercontent.s3.amazonaws.com/files/user281109/visual1507080/h48536331cb7815218574d2b8528760d5/c2.m4a"
  );
}

function setup() {
  createCanvas(500, 500); // fixed canvas size - easier if using an image
  for (let i = 0; i < 8; i++) {
    soundSwitch[i] = false; // start with everything off
  }

  // Accessibility description for screen readers
  describeElement(
    "canvas",
    "A potato with eyes that, when pressed, make different sounds. These sounds are based on musical notes but actually made by singing variations of potato in a closet during covid lockdown."
  );

  // Announce keyboard support
  createElement(
    "p",
    "You can interact with this potato by clicking eyes or by pressing the keys 1 to 8 on your keyboard to toggle sounds. MUTATE/REPLICATE THIS TRASH MAGIC APP BY VISITING THE WEBEDITOR.HTML then muck about with potato.html, potato.css, potato.js"
  );

  // Enable keyboard navigation (but hidden on mobile)
  createKeyboardSupport();
}

function draw() {
  background(255);
  translate(width / 2, height / 2); // not necessary, but some stuff would change if this isn't here

  // Display potato image
  image(potato, -100, -100, 200, 300);

  // Play sounds and highlight eyes if active
  playPotato();
}

// Toggle sounds on mouse click
function mousePressed() {
  if (getAudioContext().state !== "running") {
    getAudioContext().resume();
  }
  for (let i = 0; i < 8; i++) {
    if (
      mouseX > x[i] - 10 &&
      mouseX < x[i] + 10 &&
      mouseY > y[i] - 10 &&
      mouseY < y[i] + 10
    ) {
      soundSwitch[i] = !soundSwitch[i]; // switch on/off if mouse clicked on eye
    }
  }
}

// Handle key press events for accessibility
function keyPressed() {
  // Map keys 1 to 8 to toggle corresponding sounds
  if (key >= "1" && key <= "8") {
    let index = int(key) - 1;
    soundSwitch[index] = !soundSwitch[index]; // toggle sound
  }
}

// Function to play potato sounds and visually highlight "eyes"
function playPotato() {
  for (let i = 0; i < 8; i++) {
    if (soundSwitch[i]) {
      fill(255); // white eyes
      stroke(255);
      circle(x[i] - width / 2, y[i] - height / 2, 4); // draw circle on eye if on
      if (!sounds[i].isPlaying()) {
        sounds[i].play(); // play sound if not already playing
      }
    }
  }
}

// Create keyboard support for toggling sounds with focus and Enter/Space keys
function createKeyboardSupport() {
  for (let i = 0; i < 8; i++) {
    let btn = createButton(`Sound ${i + 1}`);
    btn.attribute("aria-label", `Play sound ${i + 1}`);
    btn.position(10, i * 40 + 20); // Position buttons for keyboard users
    btn.mousePressed(() => {
      soundSwitch[i] = !soundSwitch[i]; // toggle sound with button click
    });

    // Add keyboard interaction for 'Enter' and 'Space' keys
    btn.elt.addEventListener("keydown", (event) => {
      if (event.key === "Enter" || event.key === " ") {
        event.preventDefault(); // Prevent default scrolling behavior
        soundSwitch[i] = !soundSwitch[i]; // Toggle sound on Enter or Space
      }
    });
  }
}
