// Client-side validation: runs in the browser before the form is sent
        function validateForm() {
            var name = document.getElementById("name").value.trim();
            var year = document.getElementById("year").value;
            var msg  = document.getElementById("clientMsg");

            if (name.length < 2) {
                msg.textContent = "Please enter a name with at least 2 characters.";
                return false;
            }
            if (year < 2021 || year > 2025) {
                msg.textContent = "Year of study must be between 2021 and 2025.";
                return false;
            }
            msg.textContent = "";
            return true;
        }