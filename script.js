// Ensure the DOM is fully loaded before running the script
document.addEventListener('DOMContentLoaded', () => {
    const addDeviceButton = document.getElementById('addDeviceButton');
    const modal = document.getElementById('addDeviceModal');
    const closeButton = document.querySelector('.close-button');

    // Open the modal when the "Add Device" button is clicked
    addDeviceButton.addEventListener('click', () => {
        modal.classList.remove('hidden');
        modal.classList.add('show');
    });

    // Close the modal when the close button (x) is clicked
    closeButton.addEventListener('click', () => {
        modal.classList.remove('show');
        modal.classList.add('hidden');
    });

    // Close the modal if the user clicks outside of the modal content
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.classList.remove('show');
            modal.classList.add('hidden');
        }
    });
});
