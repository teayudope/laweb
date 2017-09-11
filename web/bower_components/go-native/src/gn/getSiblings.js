export function getSiblings(elem) {
  var siblings = [];
  var sibling = elem.parentNode.firstChild;
  for ( ; sibling; sibling = sibling.nextSibling ) {
    if ( sibling.nodeType === 1 && sibling !== elem ) {
      siblings.push( sibling );
    }
  }
  return siblings;
}

// var elem = document.querySelector('#some-element');
// var siblings = getSiblings(elem);