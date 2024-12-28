function changeEyeImage() {
    const leftEye = document.getElementById("eye-left");
    const rightEye = document.getElementById("eye-right");

    const eyeImages = window.eyeImages;

    let currentIndex = eyeImages.indexOf(leftEye.src);

    if (currentIndex === -1) {
        currentIndex = 1; 
    }

    const nextIndex = (currentIndex + 1) % eyeImages.length;

    leftEye.src = eyeImages[nextIndex];
    rightEye.src = eyeImages[nextIndex];
}