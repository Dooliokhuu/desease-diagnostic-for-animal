const formToJSON = elements => [].reduce.call(elements, (data, element) => {
  data[element.name] = element.value;
  return data;
}, {});
const handleFormSubmit = event => {
  event.preventDefault();
  const data = formToJSON(form.elements);
  const dataContainer = document.getElementsByClassName('results')[0];
  dataContainer.textContent = JSON.stringify(data, null, "  ");
};
const form = document.getElementsByClassName('myform')[0];
form.addEventListener('submit', handleFormSubmit);