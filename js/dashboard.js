       // Mobile sidebar toggle (for responsive)
        document.querySelector('.user-profile').addEventListener('click', function() {
            const sidebar = document.querySelector('.sidebar');
            if (window.innerWidth <= 576) {
                sidebar.classList.toggle('expanded');
            }
        });

        // Notification dropdown functionality
        document.querySelector('.notification-btn').addEventListener('click', function() {
            // In a real app, this would toggle a notification dropdown
            alert('You have 3 new notifications');
        });

        // Simulate loading animation
        document.addEventListener('DOMContentLoaded', function() {
            // Add animation class to cards
            const cards = document.querySelectorAll('.subject-card, .action-card, .activity-item');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'all 0.5s ease ' + (index * 0.1) + 's';
                
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 100);
            });
        });