const saveBtn = document.getElementById("js-save");
const editor = document.getElementById("editor");

document.execCommand("defaultParagraphSeparator", true, "p");

editor.addEventListener("paste", function(e) {
  e.preventDefault();
  const text = (e.originalEvent || e).clipboardData.getData("text/plain");
  document.execCommand("insertHTML", false, text);
});

saveBtn.addEventListener(
  "click",
  function(e) {
    e.preventDefault();
    saveChanges(createDataObj());
  },
  false
);

function createDataObj() {
  const headline = document.getElementById("js-headline");
  const intro = document.getElementById("js-intro");
  const content = document.getElementById("js-content");
  const data = {};
  const fields = [headline, intro, content];
  fields.map(
    field => (data[field.getAttribute("data-name")] = field.innerHTML)
  );
  return data;
}

function saveChanges(data) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "/manager/save", true);
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.onload = function() {
    if (xhr.readyState === xhr.DONE) {
      if (xhr.status === 200) {
        window.location.href = "/manager";
      }
    }
  };
  xhr.send(JSON.stringify(data));
}
