

document.addEventListener("mousemove", (e) => {
    const eyes = [
        { element: document.getElementById("eye-left"), centerX: 0, centerY: 0 },
        { element: document.getElementById("eye-right"), centerX: 0, centerY: 0 }
    ];

    eyes.forEach((eye) => {
        const rect = eye.element.parentElement.getBoundingClientRect();
        eye.centerX = rect.left + rect.width / 2;
        eye.centerY = rect.top + rect.height / 2;

        const deltaX = e.clientX - eye.centerX;
        const deltaY = e.clientY - eye.centerY;

        const angle = Math.atan2(deltaY, deltaX); 
        const distance = Math.min(3, Math.sqrt(deltaX ** 2 + deltaY ** 2)); 

        const translateX = Math.cos(angle) * distance;
        const translateY = Math.sin(angle) * distance;

        eye.element.style.transform = `translate(${translateX}px, ${translateY}px)`;
    })
})