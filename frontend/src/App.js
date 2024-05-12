import React, { useState, useEffect } from 'react';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Home from './page/home';
import Cart from './page/cart';
import Category from './page/category';
import Contact from './page/contact';
import DeliveryPayment from './page/deliveryPayment';
import Products from './page/Products';

function App() {
  const [products, setProducts] = useState([]);
  const [newName, setNewName] = useState('');
  const [newDescription, setNewDescription] = useState('');

  useEffect(() => {
    fetch('http://127.0.0.1:8000/api/products')
      .then(response => response.json())
      .then(json => setProducts(json));
  }, []);
  const updateProduct = (id) => {
    const product = products.find((product) => product.id === id);
    fetch(`http://127.0.0.1:8000/api/products/${id}`, {
      method: 'PATCH',
      body: JSON.stringify(product),
      headers: {
        'Content-Type': 'application/json; charset=utf-8',
      },
    })
      .then((response) => response.json())
      .then(() => {
      });
  };
  const deleteProduct = (id) => {
    fetch(`http://127.0.0.1:8000/api/products/${id}`, {
      method: 'DELETE',
    })
      .then((response) => response.json())
      .then(() => {
        setProducts((values) => values.filter((product) => product.id !== id));
      });
  };
  const onChangeHandler = (id, key, value) => {
    setProducts((values) =>
      values.map((product) => {
        if (product.id === id) {
          return { ...product, [key]: value };
        }
        return product;
      })
    );
  };
  const addProduct = () => {
    const name = newName.trim();
    const description = newDescription.trim();
    if (name && description) {
      fetch('http://127.0.0.1:8000/api/products', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json; charset=utf-8',
        },
        body: JSON.stringify({
          name,
          description,
        }),
      })
        .then((response) => response.json())
        .then((json) => {
          setProducts([...products, json]);
          setNewName('');
          setNewDescription('');
        });
    }
  };

  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/cart" element={<Cart />} />
        <Route
          path="/products"
          element={
            <Products
              updateProduct={updateProduct}
              deleteProduct={deleteProduct}
              onChangeHandler={onChangeHandler}
              products={products}
              newName={newName}
              newDescription={newDescription}
              setNewName={setNewName}
              setNewDescription={setNewDescription}
              addProduct={addProduct}
            />
          }
        />
        <Route path="/category" element={<Category />} />
        <Route path="/contact" element={<Contact />} />
        <Route path="/deliveryPayment" element={<DeliveryPayment />} />
      </Routes>
    </BrowserRouter>
  );
}

export default App;
