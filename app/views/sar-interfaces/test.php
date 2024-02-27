console.log("before fetch");

    var targetURL = '<?= ROOT ?>sar/examination/resultsupload';
    // Fetch data from the controller
    fetch(targetURL)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(data => {



            // Extract values from the parsed HTML
            var status = document.querySelector('#status').textContent.trim();
            examiner3 = false;
            if (status == 1) {
                examiner3 = true;
            }
            else {
                examiner3 = false;
            }
            var examiner3SubCode = document.querySelector('#examiner3SubCode').textContent.trim();

            console.log('examiner 3 = ', examiner3);
            console.log('examiner3SubCode = ', examiner3SubCode);
            elements.forEach(function (element) {
                element.dataset.active = examiner3;
            });

        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });

