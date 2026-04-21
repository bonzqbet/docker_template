FROM tomcat:9.0-jdk17-temurin

# enable manager apps
RUN cp -r /usr/local/tomcat/webapps.dist/* /usr/local/tomcat/webapps/

# remove IP restriction
RUN sed -i '/RemoteAddrValve/d' /usr/local/tomcat/webapps/manager/META-INF/context.xml
RUN sed -i '/RemoteCIDRValve/d' /usr/local/tomcat/webapps/manager/META-INF/context.xml
RUN sed -i '/RemoteAddrValve/d' /usr/local/tomcat/webapps/host-manager/META-INF/context.xml
RUN sed -i '/RemoteCIDRValve/d' /usr/local/tomcat/webapps/host-manager/META-INF/context.xml