const input = document.getElementById("myInput");

input.addEventListener("input", function() {
  const words = input.value.split(" ");
  const capitalizedWords = words.map(word => {
    return word[0].toUpperCase() + word.slice(1);
  });
  input.value = capitalizedWords.join(" ");
});