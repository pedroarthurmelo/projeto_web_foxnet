document.addEventListener('DOMContentLoaded', function() {
    const sections = document.querySelectorAll('section');

    function fadeInSections() {
        sections.forEach(section => {
            const sectionTop = section.getBoundingClientRect().top;
            const triggerPoint = window.innerHeight - 100;  // Define when the effect should trigger

            if (sectionTop < triggerPoint) {
                section.classList.add('show');
            }
        });
    }

    window.addEventListener('scroll', fadeInSections);
    fadeInSections();  // Call it initially in case some sections are in view already
});