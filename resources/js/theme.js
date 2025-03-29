document.addEventListener('DOMContentLoaded', () => {
    const themeSelect = document.querySelector('select[name="theme"]');
    const htmlElement = document.documentElement;

    // Initialize theme from localStorage or default to light
    const savedTheme = localStorage.getItem('theme') || 'light';
    htmlElement.classList.toggle('dark', savedTheme === 'dark');
    themeSelect.value = savedTheme;

    themeSelect.addEventListener('change', async (e) => {
        const selectedTheme = e.target.value;

        // Toggle dark class
        htmlElement.classList.toggle('dark', selectedTheme === 'dark');

        // Save theme to localStorage
        localStorage.setItem('theme', selectedTheme);

        // Send theme to server
        try {
            const response = await fetch('/set-theme', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ theme: selectedTheme })
            });
            
            if (!response.ok) {
                // Log detailed error information
                console.error('Server response:', await response.text());
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            
            const data = await response.json();
            console.log('Theme set:', data.theme);
        } catch (error) {
            console.error('Error setting theme:', error);
        }
    });
});