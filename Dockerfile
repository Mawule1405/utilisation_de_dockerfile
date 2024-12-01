# ----------------DEBUT COUCHE OS ------------------------

FROM debian:stable-slim

# ---------------FIN COUCHE OS -------------------------

# METADONNEES DE L'IMAGE
LABEL version="1.0" maintainer="HELOU Komlan Mawulé <helkmawule@gmail.com>"

# VARIABLES TEMPORAIRES
ARG APT_FLAGS="-q -y"
ARG DOCUMENTROOT="/var/www/html"

# ------------ DEBUT COUCHE APACHE -------------------
RUN apt-get update -y &&\
    apt-get install ${APT_FLAGS} apache2
# ------------ FIN COUCHE APACHE ------------------


# ------------ DEBUT COUCHE MYSQL --------------------
RUN apt-get install ${APT_FLAGS} mariadb-server

COPY db/etudiants.sql /

# ----------FIN COUCHE MYSQL ------------

RUN apt-get install ${APT_FLAGS} \
    php-mysql \
    php && \
    rm -f ${DOCUMENTROOT}/index.html && \
    apt-get autoclean -y

COPY app ${DOCUMENTROOT}

# ----------------- FIN COUCHE PHP -----------------


# OUVERTURE DU PORT HTTP
EXPOSE 80


#REPERTOIRE DE TRAVAIL
WORKDIR ${DOCUMENTROOT}

# DEMARRAGE DES SERVICES LORS DE L EXECUTION DE L'IMAGE

ENTRYPOINT service mariadb start && mariadb < /etudiants.sql && apache2ctl -D FOREGROUND
