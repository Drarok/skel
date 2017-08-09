function doSomethingDynamic() {
  let p = $('p');

  p
    .fadeOut()
    .promise()
    .done(() => {
      p
      .text('…and jQuery too!')
      .fadeIn();
    });
}
