/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.managedBean;

import com.sessionBean.MainSessionBean;
import javax.ejb.EJB;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.ViewScoped;

/**
 *
 * @author User
 */
@ViewScoped
@ManagedBean
public class UserManagedBean {

    @EJB
    private MainSessionBean mainSessionBean;

  
}
