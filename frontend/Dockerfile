# Official Node.js image
FROM node:14

# Create app directory
WORKDIR /app

# Install app dependencies
COPY package*.json ./

RUN npm install

# Rebuild any native modules
RUN npm rebuild

# Bundle app source
COPY . .

# Expose port
EXPOSE 8080

# Serve the app
CMD [ "npm", "run", "serve" ]