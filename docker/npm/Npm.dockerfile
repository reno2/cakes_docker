FROM node:lts-slim


RUN \
    ls -l && \
    pwd

COPY . /var/www/lara-auth.ru/custom-entrypoint.sh
CMD ["sh", "custom-entrypoint.sh"]
#RUN  node -v
#ENTRYPOINT ["sh", "custom-entrypoint.sh"]