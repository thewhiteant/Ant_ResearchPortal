// Add event listener to the 'Add Note' button
document.getElementById('addNoteBtn').addEventListener('click', function() {
    // Get the note text from the textarea
    const noteText = document.getElementById('noteText').value;
    
    // Check if the note is not empty
    if (noteText.trim()) {
        // Call function to add the note to the list
        addNoteToList(noteText);
        
        // Clear the textarea for the next note
        document.getElementById('noteText').value = ''; 
    } else {
        alert('Please enter a note.'); // Alert if the textarea is empty
    }
});

// Function to create and display a new note
function addNoteToList(noteText) {
    // Get the notes list element
    const notesList = document.getElementById('notesList');
    
    // Create a new div element for the note
    const note = document.createElement('div');
    note.classList.add('note');
    
    // Set the inner HTML of the note with the text and delete button
    note.innerHTML = `
        <p>${noteText}</p>
        <button class="delete-btn" onclick="deleteNote(this)">X</button>
    `;
    
    // Append the new note to the notes list
    notesList.appendChild(note);
}

// Function to delete a note
function deleteNote(button) {
    // Get the parent note element and remove it from the DOM
    const note = button.parentElement; 
    note.remove();
}
