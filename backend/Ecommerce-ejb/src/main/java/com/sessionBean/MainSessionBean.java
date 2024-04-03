/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.sessionBean;

import com.entities.User;
import javax.ejb.Stateless;
import javax.ejb.LocalBean;
import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;

/**
 *
 * @author martin
 */
@Stateless
@LocalBean
public class MainSessionBean {

    @PersistenceContext(unitName = "ecommerce_pu")
    private EntityManager em;

    public String createUser(String name, String password,
            String rePassword, String email, String address,
            String contactNumber, String userType) {
        User user=new User();
        user.setActive(true);
        user.setStatus(true);
        user.setUserType(userType);
        user.setName(name);
        user.setAddress(address);
        user.setContactNumber(contactNumber);
        user.setPassword(password);
        user.setEmail(email);
        em.persist(user);
        return "";
    }
    public String userLogin(String email,String password,String userType){
        return "";
    }
}
