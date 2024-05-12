import React from 'react';
import { Link } from 'react-router-dom';
import './menu.css'; 

function Menu() {
  return (
    <div className="menu-container">
      <Link to="/" className="menu-link">Home</Link>
      <Link to="/products" className="menu-link">Products</Link>
      <Link to="/cart" className="menu-link">Cart</Link>
      <Link to="/category" className="menu-link">Categories</Link>
      <Link to="/contact" className="menu-link">Contact</Link>
      <Link to="/deliveryPayment" className="menu-link">Delivery/Payment</Link>
    </div>
  );
}

export default Menu;