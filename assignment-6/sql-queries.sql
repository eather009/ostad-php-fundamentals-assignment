#task1

SELECT customer.id,
       customer.name,
       customer.email,
       customer.location,
       COUNT(orders.order_id) AS total_order
FROM Customers customer
         LEFT JOIN Orders orders ON
        customer.id =
        orders.customer_id
GROUP BY customer.id
ORDER BY total_order DESC;


#task2

SELECT orderItem.order_id,
       product.name                              AS product_name,
       orderItem.quantity,
       orderItem.quantity * orderItem.unit_price AS total_amount
FROM Order_Items orderItem
         INNER JOIN
     Products product
     ON
         orderItem.product_id = product.id
ORDER BY orderItem.order_id ASC;


#task3
SELECT category.name                                  AS category_name,
       SUM(orderItem.quantity * orderItem.unit_price) AS totalRevenue
FROM Categories category
         LEFT JOIN
     Products product
     ON
         category.id = p.category_id
         LEFT JOIN
     Order_Items orderItem
     ON
         product.id = orderItem.product_id
GROUP BY category.name
ORDER BY totalRevenue DESC;


#task4
SELECT customer.name                                  AS customer_name,
       SUM(orderItem.quantity * orderItem.unit_price) AS total_amount
FROM Customers customer
         LEFT JOIN
     Orders orders
     ON
             customer.id =
             orders.customer_id
         LEFT JOIN Order_Items orderItem ON orders.id = orderItem.order_id
GROUP BY customer.name
ORDER BY total_amount DESC LIMIT 5;
