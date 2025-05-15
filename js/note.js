document.querySelector('.user-profile').addEventListener('click', function() {
    const sidebar = document.querySelector('.sidebar');
    if (window.innerWidth <= 576) {
        sidebar.classList.toggle('expanded');
    }
});

// Upload Modal functionality
const uploadBtn = document.getElementById('uploadBtn');
const uploadEmptyBtn = document.getElementById('uploadEmptyBtn');
const uploadModal = document.getElementById('uploadModal');
const closeModal = document.getElementById('closeModal');

if (uploadBtn) {
    uploadBtn.addEventListener('click', () => {
        uploadModal.style.display = 'flex';
    });
}

if (uploadEmptyBtn) {
    uploadEmptyBtn.addEventListener('click', () => {
        uploadModal.style.display = 'flex';
    });
}

closeModal.addEventListener('click', () => {
    uploadModal.style.display = 'none';
});

// Close modal when clicking outside
window.addEventListener('click', (e) => {
    if (e.target === uploadModal) {
        uploadModal.style.display = 'none';
    }
});

// File upload preview
const fileUpload = document.querySelector('.file-upload');
const fileInput = document.querySelector('.file-upload input');
const fileInfo = document.querySelector('.file-info');

fileInput.addEventListener('change', function() {
    if (this.files && this.files[0]) {
        fileInfo.textContent = this.files[0].name;
    }
});

// Drag and drop functionality
fileUpload.addEventListener('dragover', (e) => {
    e.preventDefault();
    fileUpload.style.borderColor = 'var(--primary)';
    fileUpload.style.backgroundColor = 'rgba(99, 102, 241, 0.05)';
});

fileUpload.addEventListener('dragleave', () => {
    fileUpload.style.borderColor = 'var(--border)';
    fileUpload.style.backgroundColor = 'transparent';
});

fileUpload.addEventListener('drop', (e) => {
    e.preventDefault();
    fileUpload.style.borderColor = 'var(--border)';
    fileUpload.style.backgroundColor = 'transparent';
    
    if (e.dataTransfer.files.length) {
        fileInput.files = e.dataTransfer.files;
        fileInfo.textContent = e.dataTransfer.files[0].name;
    }
});

// Animation for note cards
document.addEventListener('DOMContentLoaded', function() {
    const noteCards = document.querySelectorAll('.note-card');
    noteCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'all 0.5s ease ' + (index * 0.1) + 's';
        
        setTimeout(() => {
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, 100);
    });
});

// Notification dropdown functionality
document.querySelector('.notification-btn').addEventListener('click', function() {
    // In a real app, this would toggle a notification dropdown
    alert('You have 3 new notifications');
});