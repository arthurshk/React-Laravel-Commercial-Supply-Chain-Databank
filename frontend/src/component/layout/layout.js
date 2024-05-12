import React from 'react';
import Info from '../header/header_top/info';
import Menu from '../header/header_button/menu';
import Footer from '../footer/menu_footer';
function Layout(props) {
  return (
    <>
        {/* <Info /> */}
        <Menu />
        {props.children}
        <Footer/>
    </>
  );
}

export default Layout;