function getValueFromSelectedRow(table, rowIndex, columnIndex) {
    var rows = table.rows;
  
    if (rowIndex >= 0 && rowIndex < rows.length) {
      var selectedRow = rows[rowIndex];
      var cellValue = selectedRow.cells[columnIndex].textContent;
      return cellValue;
    } else {
      return "Invalid row index";
    }
  }
  
  // Get the table
var myTable = document.getElementById('table_p');

// Example: Get the name (second column, index 1) from the first row (index 0)
var rowIndex = 0; // Change this index to select a different row
var columnIndex = 2; // Change this index to select a different column
document.getElementById('tr1').onclick = function(){
    console.log("bxjschjhcsjhs")
    var value = getValueFromSelectedRow(myTable, rowIndex, columnIndex);
    console.log("Value from selected row:", value);
}
 