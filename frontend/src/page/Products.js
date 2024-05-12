import React, { useState, useEffect } from 'react';
import Layout from '../component/layout/layout';
import './products.css';
function Products() {
 
  const [furnitureItems, setFurnitureItems] = useState([]);

  useEffect(() => {
    fetch('http://127.0.0.1:8000/api/products')
      .then((response) => response.json())
      .then((data) => {
        setFurnitureItems(data);
      })
      .catch((error) => {
        console.error('Error fetching products:', error);
      });
  }, []);

   const addToCart = (item) => {
    console.log('Adding item to cart:', item); 
    fetch('http://127.0.0.1:8000/api/cart', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(item),
    })
      .then((response) => {
        if (response.ok) {
          console.log('Item added to cart successfully!');
        } else {
          console.error('Failed to add item to cart.');
        }
      })
      .catch((error) => {
        console.error('Error adding item to cart:', error);
      });
  };
  return (
    <Layout>
      <div className="products-container">
        {furnitureItems.map((item) => (
          <div key={item.id} className="furniture-card">
            
            <img src={item.img_url} alt={item.name} className="furniture-img_url" />
            <h3 className="furniture-name">{item.name}</h3>
            <p className="furniture-description">{item.description}</p>
            <p className="furniture-price">{item.price}</p>
            <div className="button-container">
            <button className="add-to-cart-button" onClick={() => addToCart(item)}>
                Add to Cart
              </button>
              {/* <button className="view-item-button">View Item</button> */}
            </div>
          </div>
        ))}
      </div>
    </Layout>
  );

}

export default Products;