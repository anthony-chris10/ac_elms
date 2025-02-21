document.addEventListener("DOMContentLoaded", function() {
    // Function to load content dynamically
    function loadContent(page) {
        fetch(page)
            .then(response => response.text())
            .then(data => {
                document.getElementById("content").innerHTML = data;
            })
            .catch(error => console.error('Error loading content:', error));
    }

    // Event listener for menu links
    document.querySelectorAll(".employee-menu a").forEach(link => {
        link.addEventListener("click", function(event) {
            event.preventDefault();
            const page = this.getAttribute("href");
            loadContent(page);
        });
    });

    // Example: Load default content (dashboard) on page load
    if (document.getElementById("content")) {
        loadContent("my_profile.php"); // Default to loading My Profile page
    }
});


{/* <script src="../js/script.js"></script> */}