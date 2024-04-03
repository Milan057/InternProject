/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.sessionBean;

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
}
