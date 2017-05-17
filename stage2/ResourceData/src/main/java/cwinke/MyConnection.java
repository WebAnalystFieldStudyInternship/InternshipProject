package cwinke;

import java.io.DataInputStream;
import java.io.FileInputStream;
import java.io.IOException;
import java.sql.*;

/**
 * Created by correywinke on 3/27/17.
 */
public class MyConnection {

    private Statement myStatement = null;
    private Connection myConnection = null;

    public  MyConnection() {
        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            this.myConnection = DriverManager.getConnection("jdbc:mysql://127.0.0.1:3306/Resource_DB?useLegacyDatetimeCode=false&serverTimezone=UTC", "root", "root");
            this.myStatement = this.myConnection.createStatement();
        } catch (SQLException err) {
            System.out.println(err.getMessage());
            System.exit(0);
        } catch (Exception err) {
            System.out.println(err.getMessage());
            System.exit(0);
        }
    }

    public void run() throws IOException {
        try {
            DataInputStream inFile = new DataInputStream(new FileInputStream("/Users/correywinke/IdeaProjects/ResourceData/src/main/java/cwinke/res.txt"));
            String strName = "";
            String strPhone = "";
            String strResName = "";
            int intResID = 0;
            int intTypeID = 0;

            while (inFile.available() > 0) {
                String strTMP = inFile.readLine().trim();

                if(strTMP.indexOf("-") == 0){
                    strResName = strTMP.substring(2);
                    this.myStatement.executeUpdate("INSERT INTO ResourceTypes (ResourceTypeName) VALUES (\""+strResName+"\")");
                } else {
                    Boolean blnOnce = false;

                    for (int lcv = 0;lcv<strTMP.length();lcv++){
                        if ((Character.isDigit(strTMP.charAt(lcv)) == true) && (blnOnce == false)) {
                            strName = strTMP.substring(0, lcv);
                            strPhone = strTMP.substring(lcv);
                            blnOnce = true;

                            if(strPhone.equals("16:49 608-314-5501") == true) {
                                strPhone = "608-314-5501";
                            }
                        }
                    }
                    this.myStatement.executeUpdate("INSERT INTO Resources (ResourceName, PhoneNUMBER) Values (\""+strName+"\", \""+strPhone+"\")");
                    ResultSet resultsType = this.myStatement.executeQuery("Select ResourceTypeID from ResourceTypes where ResourceTypeName = \""+strResName+"\"");
                    resultsType.next();
                    intTypeID = Integer.parseInt(resultsType.getString("ResourceTypeID"));
                    ResultSet resultsRes = this.myStatement.executeQuery("Select ResourceID from Resources where ResourceName = \""+strName+"\"");
                    resultsRes.next();
                    intResID = Integer.parseInt(resultsRes.getString("ResourceID"));
                    this.myStatement.executeUpdate("INSERT INTO ResourceTypeAssignment (ResourceTypeID, ResourceID) Values ("+intTypeID+", "+intResID+")");
                }
            }
        } catch (SQLException err) {
            System.out.println(err.getMessage());
            System.exit(0);
        } catch (Exception err) {
            System.out.println(err.getMessage());
        }

        done();
    }

    public void done() {
        try {
            this.myStatement.close();
            this.myConnection.close();
            System.exit(0);
        } catch (SQLException err) {
            System.out.println(err.getMessage());
            System.exit(0);
        } catch (Exception err) {
            System.out.println(err.getMessage());
            System.exit(0);
        }
    }
}
