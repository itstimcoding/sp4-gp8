<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Get Value of Hidden Input</title>
</head>
<body>

<input type="hidden" id="hiddenInput" value="hiddenValue">

<script>
  // Get the hidden input element by its ID
  const hiddenInput = document.querySelector('#hiddenInput');

  // Get the value of the hidden input
  const hiddenValue = hiddenInput.value;

  // Log the value to the console
  console.log(hiddenValue); // This will log: hiddenValue
</script>

</body>
</html>