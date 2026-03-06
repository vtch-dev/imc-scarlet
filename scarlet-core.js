/*
Theme Name: IMC Scarlet
Theme URI: https://imc.ge
Author: Vano IMC (vtch-dev)
Author URI: https://imc.ge
Description: Premium, Ultra-lightweight skeleton theme for Elementor. All assets are synced via GitHub CDN.
Version: 1.0.0
License: MIT
Text Domain: imc-scarlet
*/

document.addEventListener('DOMContentLoaded', () => {
    // 1. Initialize F.A.Q System
    const initFaq = () => {
        const questions = document.querySelectorAll('.faq-question');
        questions.forEach(question => {
            question.addEventListener('click', () => {
                const item = question.parentElement;
                item.classList.toggle('active');
                
                // Optional: Close other items (Accordion style)
                const siblings = item.parentElement.querySelectorAll('.faq-item');
                siblings.forEach(sibling => {
                    if (sibling !== item) sibling.classList.remove('active');
                });
            });
        });
    };

    // Run Initializers
    initFaq();
});