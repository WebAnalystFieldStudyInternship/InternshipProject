package cwinke;

import java.io.DataInputStream;

/**
 * Created by correywinke on 3/27/17.
 */
public class mainRuner {
    public static void main(String[] args) {
        MyConnection myC = new MyConnection();
        try {
            myC.run();
        } catch (Exception err) {
            System.out.println(err.getMessage());
        }
    }
}
