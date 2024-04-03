package com.entities;

import javax.annotation.Generated;
import javax.persistence.metamodel.SingularAttribute;
import javax.persistence.metamodel.StaticMetamodel;

@Generated(value="EclipseLink-2.5.2.v20140319-rNA", date="2024-04-03T22:58:39")
@StaticMetamodel(User.class)
public class User_ { 

    public static volatile SingularAttribute<User, String> password;
    public static volatile SingularAttribute<User, String> address;
    public static volatile SingularAttribute<User, String> name;
    public static volatile SingularAttribute<User, String> contactNumber;
    public static volatile SingularAttribute<User, Boolean> active;
    public static volatile SingularAttribute<User, Long> id;
    public static volatile SingularAttribute<User, String> userType;
    public static volatile SingularAttribute<User, String> email;
    public static volatile SingularAttribute<User, Boolean> status;

}