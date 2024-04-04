package com.entities;

import com.entities.Category;
import javax.annotation.Generated;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2024-04-03T21:51:29")
@StaticMetamodel(Product.class)
public class Product_ { 

    public static volatile SingularAttribute<Product, String> image;
    public static volatile SingularAttribute<Product, String> quantity;
    public static volatile SingularAttribute<Product, Double> price;
    public static volatile SingularAttribute<Product, String> name;
    public static volatile SingularAttribute<Product, String> description;
    public static volatile SingularAttribute<Product, Long> id;
    public static volatile SingularAttribute<Product, String> tag;
    public static volatile SingularAttribute<Product, Category> categoryId;
    public static volatile SingularAttribute<Product, Boolean> status;

}