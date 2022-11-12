





<html>
<head>
  <script type="text/javascript">
    function removerows (tablebody) {
      var rows = tablebody.getElementsByTagName("tr");
      while (rows.length)
        rows[0].parentNode.removeChild(rows[0]);
    }

    function addrows (tablebody, n) {
      for (var i=0; i<n; i++) {
        var row = document.createElement("tr");
        var titlecell = document.createElement("td");
        titlecell.appendChild(document.createTextNode("Row " + i));
        row.appendChild(titlecell);

        var cell = document.createElement("td");
        var input = document.createElement("input");
        input.setAttribute("type", "text");
        input.setAttribute("name", "row["+i+"]");
        cell.appendChild(input);
        row.appendChild(cell);
        tablebody.appendChild(row);
      }
    }

    function change () {
      var select = document.getElementById("numrows");
      var index = select.selectedIndex
      var n = parseInt(select.value);
      var tablebody = document.getElementById("maintablebody");
      removerows(tablebody);
      addrows(tablebody, n);
    }
  </script>
</head>
<body>
  <form method="POST" action="act.php">
    <input type="number" min="0" id="numrows" name="numrows" onchange="change()">
  <select id="n" name="n" onchange="change()">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
  </select>
  <table id="maintable">
    <tbody id="maintablebody">
      <tr>
        <td>Row 0</td>
        <td><input type="text" name="row0" /></td>
      </tr>
    </tbody>
  </table>
  <input type="submit"/>
  </form>
</body>
</html>