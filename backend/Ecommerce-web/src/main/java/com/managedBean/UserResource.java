/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.managedBean;

import com.sessionBean.MainSessionBean;
import javax.ejb.EJB;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Produces;
import javax.ws.rs.Path;
import javax.enterprise.context.RequestScoped;
import javax.ws.rs.POST;
import javax.ws.rs.QueryParam;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;

/**
 * REST Web Service
 *
 * @author User
 */
@Path("user")
@RequestScoped
public class UserResource {

    @Context
    private UriInfo context;
    public UserResource() {
    }
   @EJB
    private MainSessionBean mainSessionBean;
    @POST
    @Path("/register")
    @Produces(MediaType.APPLICATION_JSON)
    public Response userRegister(@QueryParam("name") String name,
            @QueryParam("email") String email,
            @QueryParam("password") String password,
            @QueryParam("confirm_password") String Repassword,
            @QueryParam("address") String address,
            @QueryParam("contact_number")String contactNumber,
            @QueryParam("user_type") String userType){
        try{
       mainSessionBean.createUser(name, password, Repassword, email, address, contactNumber, userType);
        return Response.status(Response.Status.OK).entity("User Register Sucessfully").build();
        }catch(Exception e){
            System.out.println(e.getMessage());
            return Response.status(Response.Status.INTERNAL_SERVER_ERROR).entity("Something went wrong!").build();
        }
        
    }
    @POST
    @Path("/login")
      @Produces(MediaType.APPLICATION_JSON)
    public Response userLogin(
            @QueryParam("email") String email,
            @QueryParam("password") String password,
            @QueryParam("user_type") String userType){
        try{
       mainSessionBean.userLogin(email, password,userType);
        return Response.status(Response.Status.OK).entity("User Login Sucessfully").build();
        }catch(Exception e){
            System.out.println(e.getMessage());
            return Response.status(Response.Status.INTERNAL_SERVER_ERROR).entity("Something went wrong!").build();
        }
        
    }
}
