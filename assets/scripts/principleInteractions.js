const principleButtons = document.querySelectorAll('.principle-buttons button');
principleButtons.forEach((button) => button.addEventListener('click', () => button.classList.toggle('active')));

// Crap Principle
const contrastSizeButton = document.getElementById('contrastSize');
const contrastColorButton = document.getElementById('contrastColor');

const contrastSection = document.getElementById('contrast');

contrastSizeButton.addEventListener('click', () => {
  contrastSection.classList.toggle('size-active');
});

contrastColorButton.addEventListener('click', () => {
  contrastSection.classList.toggle('color-active');
});

// Repetition Principle
const repetitionTypefaceButton = document.getElementById('repetitionTypeface');
const repetitionColorButton = document.getElementById('repetitionColor');

const repetitionSection = document.getElementById('repetition');

repetitionTypefaceButton.addEventListener('click', () => {
  repetitionSection.classList.toggle('typeface-active');
});

repetitionColorButton.addEventListener('click', () => {
  repetitionSection.classList.toggle('color-active');
});

// Alignment Principle
const alignmentElementsButton = document.getElementById('alignmentElements');
const alignmentTextButton = document.getElementById('alignmentText');

const alignmentSection = document.getElementById('alignment');

alignmentElementsButton.addEventListener('click', () => {
  alignmentSection.classList.toggle('elements-active');
});

alignmentTextButton.addEventListener('click', () => {
  alignmentSection.classList.toggle('text-active');
});

// Proximity Principle
const proximityDensityButton = document.getElementById('proximityDensity');
const proximitySpacingButton = document.getElementById('proximitySpacing');

const proximitySection = document.getElementById('proximity');

proximityDensityButton.addEventListener('click', () => {
  proximitySection.classList.toggle('density-active');
});

proximitySpacingButton.addEventListener('click', () => {
  proximitySection.classList.toggle('spacing-active');
});
