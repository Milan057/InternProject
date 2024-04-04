package com.entities;

import com.entities.Product;
import com.entities.User;
import java.util.Date;
import javax.annotation.Generated;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2024-04-03T22:58:39")
@StaticMetamodel(Orders.class)
public class Orders_ { 

    public static volatile SingularAttribute<Orders, String> quantity;
    public static volatile SingularAttribute<Orders, Product> productId;
    public static volatile SingularAttribute<Orders, Double> price;
    public static volatile SingularAttribute<Orders, Long> id;
    public static volatile SingularAttribute<Orders, User> userId;
    public static volatile SingularAttribute<Orders, Date> orderDate;

}