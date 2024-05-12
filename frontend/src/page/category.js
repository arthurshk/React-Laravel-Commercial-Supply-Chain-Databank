import React, { useState, useEffect } from 'react';
import Layout from '../component/layout/layout';
import { Link } from 'react-router-dom'; 
import './category.css';
function Category() {
 
  const [categoryItems, setCategoryItems] = useState([]);

  useEffect(() => {
    fetch('http://127.0.0.1:8000/api/category')
      .then((response) => response.json())
      .then((data) => {
        setCategoryItems(data);
      })
      .catch((error) => {
        console.error('Error fetching categories:', error);
      });
  }, []);

  return (
    <Layout>
      <div className="categories-list">
        {categoryItems.map((category, index) => (
          <div className="category-card">
            <img src={category.img} alt={category.name} className="category-img" />
            <h3 className="category-name">{category.name}</h3>
          </div>
        ))}
      </div>
    </Layout>
  );
}

export default Category;