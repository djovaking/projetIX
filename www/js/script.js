function showAddUserForm() {
  // Get the form element by its ID or any other selector
  var form = document.getElementById("addUserForm");

  // Toggle the visibility of the form
  form.style.display = form.style.display === "none" ? "block" : "none";
}
function editUser(button) {
  var row = button.parentNode.parentNode; // Get the parent <tr> element
  var cells = row.querySelectorAll(".editable"); // Get all cells with the "editable" class

  cells.forEach(function (cell) {
    var value = cell.querySelector("div").innerText; // Get the current cell value

    // Create an <input> element and set its value to the current cell value
    var input = document.createElement("input");
    input.value = value;

    // Replace the <div> element with the <input> element
    cell.innerHTML = "";
    cell.appendChild(input);
  });
}

console.log("go!");
