import React from 'react';

const Breadcrumbs = () => {
  
  let currCrumb = ['Dashboard', 'Theme Builder'];

  return (
    <nav className='ast-tb-breadcrumbs'>
      {currCrumb.map((item, index) => (
        <span className='ast-tb-crumb' key={index}>
          {item}
          {index < currCrumb.length - 1 &&
            <span className='ast-tb-crumb-icon'>{ ' > '}</span>
          }
        </span>
      ))}
    </nav>
  );
}

export default Breadcrumbs;