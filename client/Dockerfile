FROM node:18-alpine

RUN npm install -g http-server

COPY . /client/

WORKDIR /client

EXPOSE 8080

CMD [ "http-server" ]
