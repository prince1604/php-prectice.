document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const formData = new FormData(this);

    const xhr = new XMLHttpRequest();

    xhr.open('POST', 'submit.php', true);

    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById('response').innerHTML = xhr.responseText;
        } else {
            document.getElementById('response').innerHTML = 'An error occurred.';
        }
    };

    xhr.send(formData);
});

