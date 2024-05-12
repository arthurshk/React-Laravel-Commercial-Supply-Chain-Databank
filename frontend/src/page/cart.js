import React, { useState, useEffect } from 'react';
import Layout from '../component/layout/layout';
import './cart.css';

function Cart() {
  const [cartItems, setCartItems] = useState([]);

  useEffect(() => {
    fetch('http://127.0.0.1:8000/api/cart')
      .then((response) => response.json())
      .then((data) => {
        setCartItems(data);
      })
      .catch((error) => {
        console.error('Error fetching cart items:', error);
      });
  }, []);

  const calculateTotal = () => {
    return cartItems.reduce((total, item) => {
      const itemPrice = parseFloat(item.price.replace('$', ''));
      return isNaN(itemPrice) ? total : total + itemPrice;
    }, 0);
  };

  const removeFromCart = (id) => {
    const updatedCart = cartItems.filter((item) => item.id !== id);
    setCartItems(updatedCart);
    fetch(`http://127.0.0.1:8000/api/cart/${id}`, {
      method: 'DELETE',
    })
      .then((response) => {
        if (response.ok) {
          console.log(`Item with ID ${id} removed from the database.`);
        } else {
          console.error(`Failed to remove item with ID ${id} from the database.`);
        }
      })
      .catch((error) => {
        console.error('Error removing item from the database:', error);
      });
  };

  return (
    <Layout>
      <div className="cart-container">
        <h1>Shopping Cart</h1>
        {cartItems.map((item) => (
          <div key={item.id} className="cart-item">
            <div className="item-details">
              <h2>{item.name}</h2>
              <p>Description: {item.description}</p>
              <p>Price: {item.price}</p>
              <img src={item.img_url} alt={item.name} /> 
              <div>
                <button className="remove-item-button" onClick={() => removeFromCart(item.id)}>
                  Remove
                </button>
              </div>
            </div>
          </div>
        ))}
        <div className="cart-summary">
          <p>Total: ${calculateTotal()}</p>
          {/* <button className="checkout-button">Checkout</button> */}
        </div>
      </div>
    </Layout>
  );
}

export default Cart;
