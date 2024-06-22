// Drag over handler
function dragOverHandler(event) {
    event.preventDefault();
    document.querySelector('.dropArea').classList.remove('border-dashed');
    document.querySelector('.dropArea').classList.add('border-4', 'border-blue-500');
    document.querySelector('.dragText').textContent = "Release to Upload File";
}

// Drag leave handler
function dragLeaveHandler(event) {
    event.preventDefault();
    document.querySelector('.dropArea').classList.add('border-dashed');
    document.querySelector('.dropArea').classList.remove('border-4', 'border-blue-500');
    document.querySelector('.dragText').textContent = "Drag and Drop to Upload File";
}

// Drop handler
function dropHandler(event) {
    event.preventDefault();
    document.querySelector('.dropArea').classList.remove('border-dashed');
    document.querySelector('.dropArea').classList.add('border-4', 'border-blue-500');

    var files = event.dataTransfer.files;
    if (files.length > 0) {
        handleFiles(files);
    }
}

// Handle dropped files
function handleFiles(files) {
    var file = files[0];
    if (file.type.startsWith('image/')) {
        var reader = new FileReader();
        reader.onload = function(event) {
            var img = document.createElement('img');
            img.src = event.target.result;
            img.classList.add( 'object-fit','w-full', 'h-full');
            img.onload = function() {
                // Display image preview
                var dropArea = document.querySelector('.dropArea');
                dropArea.innerHTML = ''; // Clear previous content
                dropArea.appendChild(img);
                var fileInput = document.querySelector('.fileInput');
                fileInput.value = event.target.result;
            };
        };
        reader.readAsDataURL(file);
    } else {
        alert('Please drop an image file.');
    }
}

// Event listeners
document.addEventListener('DOMContentLoaded', function() {
    var dropArea = document.querySelector('.dropArea');

    dropArea.addEventListener('dragover', dragOverHandler);
    dropArea.addEventListener('dragleave', dragLeaveHandler);
    dropArea.addEventListener('drop', dropHandler);
});
