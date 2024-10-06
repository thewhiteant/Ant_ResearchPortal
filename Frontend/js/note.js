// // Add event listener to the 'Add Note' button
// document.getElementById("addNoteBtn").addEventListener("click", function () {
//   // Get the note text from the textarea
//   const noteText = document.getElementById("noteText").value;

//   // Check if the note is not empty
//   if (noteText.trim()) {
//     // Call function to add the note to the list
//     addNoteToList(noteText);

//     // Clear the textarea for the next note
//     document.getElementById("noteText").value = "";
//   } else {
//     alert("Please enter a note."); // Alert if the textarea is empty
//   }
// });

// // Function to create and display a new note
// function addNoteToList(noteText) {
//   // Get the notes list element
//   const notesList = document.getElementById("notesList");

//   // Create a new div element for the note
//   const note = document.createElement("div");
//   note.classList.add("note");

//   // Set the inner HTML of the note with the text and delete button
//   note.innerHTML = `
//     <p>${noteText}</p>
//     <button class="delete-btn" onclick="deleteNote(this)">X</button>
//   `;

//   // Append the new note to the notes list
//   notesList.appendChild(note);

//   // Scroll to the bottom of the notes list (optional)
//   notesList.scrollTop = notesList.scrollHeight;
// }

// // Function to delete a note
// function deleteNote(button) {
//   // Get the parent note element and remove it from the DOM
//   const note = button.closest(".note");
//   note.remove();
// }

const dark_mode = [
  {
    "--bg_color": "#191A19",
    "--left_strip": "#fcce2a94",
    "--right_strip": "#c0eba6a0",
    "--top_bar_bottom_border": "rgba(255, 234, 177, 0.841)",
    "--top_bar_shadow": "#ffffff63",
    "--input_border_color": "#9eff71a9",
    "--sign_txt_clr": "#ffde65",
    "--placeHolder_txt_clr": "rgb(255, 255, 255)",
    "--item_bg_clr": "#4a4a4a",
    "--all_txt_clr": "#dcdcdc",
    "--items_shadow": "#0000004d",
    "--log_out": "rgba(255, 115, 55, 0.999)",
    "--log_out_after": "rgb(146, 224, 250)",
    "--switch_bgc": "#00000040",
    "--switch_bgc_after": "#f9ffeb",
    "--switch_checked": "#2d6423",
    "--time": "rgb(218, 218, 218)",
    "--input_bg_clr": "rgb(100, 100, 100)",
    "--upload_icon_bg_clr": "#006800",
    "--upload_icon_clr": "white",
    "--upload_border": "#ffffffaa",
  },
  {
    "--bg_color": "#fffbe6",
    "--left_strip": "#fccd2a",
    "--right_strip": "#c0eba6",
    "--top_bar_bottom_border": "gray",
    "--top_bar_shadow": "#00000080",
    "--input_border_color": "#347928",
    "--sign_txt_clr": "blue",
    "--placeHolder_txt_clr": "black",
    "--item_bg_clr": "#ffffec",
    "--all_txt_clr": "#000",
    "--items_shadow": "#0000004d",
    "--log_out": "red",
    "--log_out_after": "blue",
    "--switch_bgc": "#00000040",
    "--switch_bgc_after": "#f9ffeb",
    "--switch_checked": "#2d6423",
    "--time": "gray",
    "--input_bg_clr": "white",
    "--upload_icon_bg_clr": "#009a00",
    "--upload_icon_clr": "white",
    "--upload_border": "black",
  },
];
const darkMode_btn = document.getElementById("toggle");
darkMode_btn.addEventListener("change", () => {
  console.log("hello");
  if (darkMode_btn.checked) {
    i = 2;
    change_theme(0);
  } else {
    i = 0;
    change_theme(1);
  }
});
function change_theme(e) {
  for (const [key, value] of Object.entries(dark_mode[e])) {
    document.documentElement.style.setProperty(key, value);
  }
}
